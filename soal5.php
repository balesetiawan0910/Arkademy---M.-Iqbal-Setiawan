<html>
<head><title></head></title>
<body></body>
<script>
    let total=0;
    const createMatrixCol = (dim) => {
        let itemsCol = [];
        for(let i=0; i < dim; i++){
            itemsCol.push(createMatrixRow(dim));
        }
        calculateDiagonal(dim, itemsCol);
        return itemsCol;
    }

    const createMatrixRow = (dim) => {
        let itemsRow = [];
        for(let i=0; i < dim; i++){
            itemsRow.push(Math.round(Math.random() * 10));
        }
        return itemsRow;
    }

    const calculateDiagonal = (dim, items) => {
        let x = dim-1;
        for(let i=0; i < dim; i++){
            total += items[i][i];
            total += items[i][x];
            x--;
        }
    }

    console.log("Matrix : ");
    console.log(createMatrixCol(3))
    console.log("Calculate Result : " + total)
</script>
</html>