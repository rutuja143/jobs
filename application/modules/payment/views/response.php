<?php

$resultIndicator = $this->input->get('resultIndicator');
if ($resultIndicator == $successIndicator) {
    ?>
    <p>You are now premium candidate. We will give you higher preference.
    </p>
    <p>
        Please be informed that, we have upcoming openings with our clients from America ,GCC & Far East Asia and India are going to recruit different post for various industries in the following months. They are going to make a selection from the website, which also includes Government Company for different Position. The Salary offered is one of the best in the industry, As you are our paid member now so we will give you high preference to get on board.
    </p>
<?php
} else {
    echo 'payment fail';
}

?>