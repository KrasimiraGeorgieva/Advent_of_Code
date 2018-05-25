<?php

$hashed_answers = [
    "1" => '$2y$13$Z79F6vmu7Ps2uX7FpbC9W.HqS75CP91hrGUXhBxm3QPvURfnVtx5W',
    "2" => '$2y$13$Td2uZUh9EEnswE6LyqbJMuG2jLzgG4aWxqAnBCaUUDrEoO3KUL81K',
    "3.1" => '$2y$13$MnYwsgjkEHSSzagNR5PHAuXRH5ZHGyDwxocsS8q4vFjrPcIk5wmXG',
    "3.2" => '$2y$13$7wqQghAfM9qzS3hsEvsNaOJDYOmNqqtap319Dn7vQrRhw8lfMIVVS'
];

if (isset($_POST['question'])) {
    if (
        hash_equals(
            $hashed_answers[$_POST['question']],
            crypt($_POST['answer'], $hashed_answers[$_POST['question']])
        )
    )
    {
        echo "Answer to question {$_POST['question']} <font color='green'>Right</font>";
    } else {
        echo "Answer to question {$_POST['question']} <font color='red'>Wrong</font>";
    }
}

//var_dump(crypt("", '$2y$13$22charactersalt$'));

?>

<p>Question 1</p>
<form action="" method="post">
    <input type="hidden" name="question" value="1">
    <input type="text" name="answer" placeholder="Answer">
    <input type="submit" value="Check">
</form>

<p>Question 2</p>
<form action="" method="post">
    <input type="hidden" name="question" value="2">
    <input type="text" name="answer" placeholder="Answer">
    <input type="submit" value="Check">
</form>

<p>Question 3 part 1</p>
<form action="" method="post">
    <input type="hidden" name="question" value="3.1">
    <input type="text" name="answer" placeholder="Answer">
    <input type="submit" value="Check">
</form>

<p>Question 3 part 2</p>
<form action="" method="post">
    <input type="hidden" name="question" value="3.2">
    <input type="text" name="answer" placeholder="Answer">
    <input type="submit" value="Check">
</form>
