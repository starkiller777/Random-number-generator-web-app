<?php
    $DICE_TYPE_NUMBER = $_POST["dice-type"];
    $DICE_NUMBER = filter_var($_POST["dice-number"], FILTER_VALIDATE_INT);
    if ($DICE_NUMBER < 1 || $DICE_NUMBER > 5) {
        echo "<script>alert('Invalid number of dice. Please enter a value between 1 and 5.'); window.location.href = 'form.php';</script>";
        exit();
    }
    
    function findRandomNumber($diceTypeNumber, $diceNumber) {
        $resultArray = [];
        for ($i = 0; $i < $diceNumber; $i++) {
            $resultArray[] = rand(1, $diceTypeNumber);
        }
        return $resultArray;
    }

    $RESULT = findRandomNumber($DICE_TYPE_NUMBER, $DICE_NUMBER);
    $TOTAL = array_sum($RESULT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Roll Results</title>
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
        .result-view {
            position: relative;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .result-view__dice-type {
            margin: 0.6rem 0 0.6rem 0;
        }
        .result-view__number-total {
            display: none;
            padding: 0.6rem;
            font-size: 7rem;
        }
        .result-view__number-table {
            position: absolute;
            top: 9.4rem;
        }
        td {
            font-size: 5rem;
            text-align: center;
            padding: 1.6rem 2rem;
        }
        .result-view__button {
            position: absolute;
            top: 19.4rem;
        }
    </style>
</head>
<body>
    <div class="result-view">
        <div class="result-view__row result-view__dice-type">Type of Dice: D<?php echo htmlspecialchars($DICE_TYPE_NUMBER) ?></div>
        <div class="result-view__row result-view__number-total" ><?php echo htmlspecialchars($TOTAL) ?></div>
        <div class="result-view__row result-view__number-table">
            <table>
                <tr>
                    <?php foreach($RESULT as $item) {?>
                        <td class="result-view__number" dataNum="<?php echo htmlspecialchars($item) ?>"></td>
                    <?php } ?>
                </tr>
            </table>
        </div>
        <button class="result-view__button" onclick="window.location.href='./form.php';".>Return To Dice Selector</button>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const numbers = document.querySelectorAll(".result-view__number");
        const totalSum = document.querySelector(".result-view__number-total");
    
        numbers.forEach(number => {
            const target = parseInt(number.getAttribute("dataNum"), 10);

            // Counting operation
            function animateCount(element, target) {
                return new Promise(resolve => {
                    let count = 0;
                    const interval = setInterval(() => {
                        count++;
                        element.textContent = count;
                        if (count === target) {
                            clearInterval(interval);
                            resolve();
                        }
                    }, 50);
                });
            }

            async function sequentialCount() {
                for (const number of numbers) {
                    const target = parseInt(number.getAttribute("dataNum"), 10);
                    await animateCount(number, target);
                }

                totalSum.style.display = "block";
            }

            sequentialCount();
        });
    });
</script>
</html>
