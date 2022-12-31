<?php $this->layout('template', ['title' => $this->e($title)]) ?>

<h1><?=$this->e($title)?></h1>

<!-- form to submit problem input -->
<?php if (isset($partOneResult) || isset($partTwoResult)): ?>
    <p>Part One Result: <?=$this->e($partOneResult)?></p>
    <p>Part Two Result: <?=$this->e($partTwoResult)?></p>
<?php else: ?>
    <textarea name="input" form="day-form" rows=20></textarea>
    <form
        id="day-form"
        action="<?=$this->e($name)?>"
        method="post"
    >
        <input type="submit" value="Submit" />
    </form>
<?php endif; ?>
