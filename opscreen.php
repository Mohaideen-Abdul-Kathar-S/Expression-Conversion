<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortut icon" type="x-icon" href="llog12.png">
    <title>EXPRESSION CONVERTER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-fieldset {
            padding: 20px;
            margin-top: 20px;
            border: 2px solid #007BFF;
            border-radius: 10px;
        }
        .custom-legend {
            width: auto;
            padding: 0 10px;
            border-bottom: none;
            font-size: 1.5rem;
            color: #007BFF;
        }
        .bg-custom {
            background-color: #f8f9fa;
            min-height: 100vh;
        }
        .form-control-custom {
            width: 100%;
            max-width: 300px;
        }
        .btn-custom {
            width: 100px;
        }
    </style>
</head>
<body class="bg-custom d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="conversionForm">
                    <fieldset class="custom-fieldset bg-white shadow-sm">
                        <legend class="custom-legend">Input Box</legend>
                        <div class="mb-3 text-center">
                            <h4>Enter Expression</h4>
                            <input type="text" class="form-control form-control-custom mx-auto" id="inputExpression" placeholder="Expression">
                        </div>
                    </fieldset>

                    <fieldset class="custom-fieldset bg-white shadow-sm mt-4">
                        <legend class="custom-legend">Output Box</legend>
                        <div class="mb-3 text-center">
                            <h4>Output Expression</h4>
                            <input type="text" class="form-control form-control-custom mx-auto" id="outputExpression" placeholder="Expression" readonly>
                        </div>
                        <div class="mb-3 text-center">
                            <h4>Solution</h4>
                            <input type="text" class="form-control form-control-custom mx-auto" id="solution" placeholder="Solution" readonly>
                        </div>
                    </fieldset>

                    <div class="d-flex justify-content-between mt-4">
                        <button type="button" class="btn btn-secondary btn-custom" onclick="window.location.href='Convrt.php'">Back</button>
                        <button type="button" class="btn btn-warning btn-custom" onclick="window.location.href='afterlogin.php'">Home</button>
                        <button type="button" class="btn btn-danger btn-custom" onclick="resetFields()">Reset</button>
                        <button type="button" class="btn btn-primary btn-custom" onclick="convertExpression()">Convert</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script>
        // Function to check if the expression is balanced
        function isBalanced(expression) {
            const stack = [];
            const openers = '({[';
            const closers = ')}]';
            const matches = {
                ')': '(',
                '}': '{',
                ']': '['
            };

            for (const char of expression) {
                if (openers.includes(char)) {
                    stack.push(char);
                } else if (closers.includes(char)) {
                    if (stack.length === 0 || stack.pop() !== matches[char]) {
                        return false;
                    }
                }
            }

            return stack.length === 0;
        }

        
        function infixToPostfix(expression) {
            const precedence = { '^': 3, '*': 2, '/': 2, '+': 1, '-': 1 };
            const stack = [];
            let postfix = '';

            for (const char of expression) {
                if (/[a-zA-Z0-9]/.test(char)) {
                    postfix += char;
                } else if (char === '(') {
                    stack.push(char);
                } else if (char === ')') {
                    while (stack.length && stack[stack.length - 1] !== '(') {
                        postfix += stack.pop();
                    }
                    stack.pop();
                } else {
                    while (stack.length && precedence[char] <= precedence[stack[stack.length - 1]]) {
                        postfix += stack.pop();
                    }
                    stack.push(char);
                }
            }

            while (stack.length) {
                postfix += stack.pop();
            }

            return postfix;
        }

        function evaluatePostfix(expression) {
            const stack = [];

            for (const char of expression) {
                if (/[0-9]/.test(char)) {
                    stack.push(parseInt(char, 10));
                } else {
                    const b = stack.pop();
                    const a = stack.pop();
                    switch (char) {
                        case '+':
                            stack.push(a + b);
                            break;
                        case '-':
                            stack.push(a - b);
                            break;
                        case '*':
                            stack.push(a * b);
                            break;
                        case '/':
                            stack.push(a / b);
                            break;
                    }
                }
            }

            return stack[0];
        }

        function infixToPrefix(expression) {
            function reverseString(str) {
                return str.split('').reverse().join('');
            }

            function replaceParentheses(str) {
                let result = '';
                for (let char of str) {
                    if (char === '(') {
                        result += ')';
                    } else if (char === ')') {
                        result += '(';
                    } else {
                        result += char;
                    }
                }
                return result;
            }

            expression = reverseString(expression);
            expression = replaceParentheses(expression);
            let postfix = infixToPostfix(expression);
            let prefix = reverseString(postfix);
            return prefix;
        }

        function postfixToInfix(expression) {
            const stack = [];

            for (const char of expression) {
                if (/[a-zA-Z0-9]/.test(char)) {
                    stack.push(char);
                } else {
                    const op1 = stack.pop();
                    const op2 = stack.pop();
                    stack.push(`(${op2}${char}${op1})`);
                }
            }

            return stack[0];
        }

        function postfixToPrefix(expression) {
            const stack = [];

            for (const char of expression) {
                if (/[a-zA-Z0-9]/.test(char)) {
                    stack.push(char);
                } else {
                    const op1 = stack.pop();
                    const op2 = stack.pop();
                    stack.push(char + op2 + op1);
                }
            }

            return stack[0];
        }

        function prefixToPostfix(expression) {
            const stack = [];

            for (let i = expression.length - 1; i >= 0; i--) {
                const char = expression[i];
                if (/[a-zA-Z0-9]/.test(char)) {
                    stack.push(char);
                } else {
                    const op1 = stack.pop();
                    const op2 = stack.pop();
                    stack.push(op1 + op2 + char);
                }
            }

            return stack[0];
        }

        function prefixToInfix(expression) {
            const stack = [];

            for (let i = expression.length - 1; i >= 0; i--) {
                const char = expression[i];
                if (/[a-zA-Z0-9]/.test(char)) {
                    stack.push(char);
                } else {
                    const op1 = stack.pop();
                    const op2 = stack.pop();
                    stack.push(`(${op1}${char}${op2})`);
                }
            }

            return stack[0];
        }

        // Main conversion function
        function convertExpression() {
            const inputType = localStorage.getItem('inputType');
            const outputType = localStorage.getItem('outputType');
            const expression = document.getElementById('inputExpression').value;

            if (!isBalanced(expression)) {
                alert('The input expression is unbalanced.');
                return;
            }

            let result = expression;
            let solution = '';

            if (inputType === 'Infix' && outputType === 'Postfix') {
                result = infixToPostfix(expression);
                if (/^[0-9+\-*/]+$/.test(expression)) {
                    solution = evaluatePostfix(result);
                }
            } else if (inputType === 'Infix' && outputType === 'Prefix') {
                result = infixToPrefix(expression);
            } else if (inputType === 'Postfix' && outputType === 'Infix') {
                result = postfixToInfix(expression);
            } else if (inputType === 'Postfix' && outputType === 'Prefix') {
                result = postfixToPrefix(expression);
            } else if (inputType === 'Prefix' && outputType === 'Postfix') {
                result = prefixToPostfix(expression);
            } else if (inputType === 'Prefix' && outputType === 'Infix') {
                result = prefixToInfix(expression);
            }
            document.getElementById('outputExpression').value = result;
            document.getElementById('solution').value = solution;
        }

        // Reset fields function
        function resetFields() {
            document.getElementById('inputExpression').value = '';
            document.getElementById('outputExpression').value = '';
            document.getElementById('solution').value = '';
        }

        // Ensure that the selected types are retrieved from localStorage on load
        window.onload = function() {
            if (!localStorage.getItem('inputType') || !localStorage.getItem('outputType')) {
                alert('Please select input and output types first.');
                window.location.href = 'Convrt.php';
            }
        }
    </script>
</body>
</html>

