<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="x-icon" href="llog12.png">
    <title>EXPRESSION CONVERTER</title>
    <style>
        .bg-img {
            background-image: url(coverbg.jpg);
        }
        .rounded-table {
            border-radius: 20px;
            overflow: hidden;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-img">
    <form id="expressionForm">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <fieldset class="border border-white rounded p-3">
                        <legend class="text-right text-white">Input Type</legend>
                        <div class="container mt-3">
                            <div class="table-responsive">
                                <table class="table table-primary table-hover rounded-table">
                                    <thead>
                                        <tr>
                                            <th>Choose any one Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="PrefixInput" name="InputType" value="Prefix" onclick="disableSameOption('InputType', 'OutputType')">
                                                    <label class="form-check-label" for="PrefixInput">Prefix</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="InfixInput" name="InputType" value="Infix" onclick="disableSameOption('InputType', 'OutputType')">
                                                    <label class="form-check-label" for="InfixInput">Infix</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="PostfixInput" name="InputType" value="Postfix" onclick="disableSameOption('InputType', 'OutputType')">
                                                    <label class="form-check-label" for="PostfixInput">Postfix</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="border border-white rounded p-3 mt-4">
                        <legend class="text-right text-white">Output Type</legend>
                        <div class="container mt-3">
                            <div class="table-responsive">
                                <table class="table table-secondary table-hover rounded-table">
                                    <thead>
                                        <tr>
                                            <th>Choose any one Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="PrefixOutput" name="OutputType" value="Prefix" onclick="disableSameOption('OutputType', 'InputType')">
                                                    <label class="form-check-label" for="PrefixOutput">Prefix</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="InfixOutput" name="OutputType" value="Infix" onclick="disableSameOption('OutputType', 'InputType')">
                                                    <label class="form-check-label" for="InfixOutput">Infix</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="PostfixOutput" name="OutputType" value="Postfix" onclick="disableSameOption('OutputType', 'InputType')">
                                                    <label class="form-check-label" for="PostfixOutput">Postfix</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </fieldset>
                    <div class="mt-4 p-5 bg-primary text-white rounded text-center">
                        <div class="btn-group">
                            <a href="afterlogin.php" class="btn btn-secondary">Back</a>
                            <button type="button" class="btn btn-danger" onclick="unselectAll()">Unselect</button>
                            <button type="button" class="btn btn-success" onclick="redirectToNext()">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function unselectAll() {
            document.querySelectorAll('input[type="radio"]').forEach((radio) => {
                radio.checked = false;
            });
            disableSameOption();
        }

        function disableSameOption(changedGroup, otherGroup) {
            let selectedValue = document.querySelector(`input[name="${changedGroup}"]:checked`);
            document.querySelectorAll(`input[name="${otherGroup}"]`).forEach((radio) => {
                radio.disabled = selectedValue && radio.value === selectedValue.value;
            });
        }

        function redirectToNext() {
            const inputType = document.querySelector('input[name="InputType"]:checked');
            const outputType = document.querySelector('input[name="OutputType"]:checked');
            
            if (!inputType || !outputType) {
                alert('Please select both Input Type and Output Type.');
                return;
            }

            // Store the selected types in local storage
            localStorage.setItem('inputType', inputType.value);
            localStorage.setItem('outputType', outputType.value);

            window.location.href = 'opscreen.php';
        }
    </script>
</body>
</html>
