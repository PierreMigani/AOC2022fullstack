<div class="day-results">
    <p>Part One Result: <?=$this->e($partOneResult)?></p>
    <p>Part Two Result: 
        <canvas id="painted-result" width="120" height="20">
        </canvas>
    </p>

</div>

<script>
    const canvas = document.getElementById('painted-result');
    const ctx = canvas.getContext('2d');

    const paintedResult = <?=$partTwoResult?>;

    const paintedResultHeight = paintedResult.length;
    const paintedResultWidth = paintedResult[0].length;
    const canvasHeight = canvas.height;
    const canvasWidth = canvas.width;
    const cellHeight = canvasHeight / paintedResultHeight;
    const cellWidth = canvasWidth / paintedResultWidth;

    for (let i = 0; i < paintedResultHeight; i++) {
        for (let j = 0; j < paintedResultWidth; j++) {
            const cell = paintedResult[i][j];
            ctx.fillStyle = cell === '#' ? 'black' : 'white';
            ctx.fillRect(j * cellWidth, i * cellHeight, cellWidth, cellHeight);
        }
    }
</script>
