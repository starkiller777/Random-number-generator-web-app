<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Roller</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:600');
        *{
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }
        body {
            gap: 0.5rem;
            min-height: 100vh;
            background: #FFCC10;
            text-align: center;
        }
        button{
            outline: none;
            background: none;
            border: 2px solid #000;
            padding: 1rem;
            cursor: pointer;
            font-size: 1.2rem;
        }
        button:active{
            background: #000;
            color: #FFCC10;
        }

        .dice-info-form {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            flex-direction: column;
        }
        .dice-info-form__row {
            display: flex;
            font-size: 5rem;
        }
        .dice-info-form__button {
            font-size: 3.2rem;
            padding: 1.2rem;
        }
        .dice-info-form__input {
            background-color: #FFCC10;
            font-size: 5rem;
            margin-left: 0.6rem;
        }
        .dice-info-form__input-text {
            max-width: 3.8vw;
            padding: 0 0.4rem 0 1rem;
        }
        .dice-info-form__input-select {
            max-width: 14vw;
        }
    </style>
</head>
<body>
    <div class="dice-info">
        <form action="index.php" method="POST" class="dice-info-form">
            <div class="dice-info-form__row">
                <label class="dice-info-form__label">Number of dices (Max is 5):</label>
                <input type="text" class="dice-info-form__input dice-info-form__input-text" name="dice-number" min="1" max="5">
            </div>
            <div class="dice-info-form__row">
                <label class="dice-info-form__label">Type of dices:</label>
                <select class="dice-info-form__input dice-info-form__input-select" name="dice-type">
                    <option value="4">D4</option>
                    <option value="6">D6</option>
                    <option value="8">D8</option>
                    <option value="10">D10</option>
                    <option value="12">D12</option>
                    <option value="20">D20</option>
                </select>
            </div>
            <div class="dice-info-form__row">
                <button action="submit" class="dice-info-form__button">Roll Dices</button>
            </div>
        </form>
    </div>
</body>
</html>