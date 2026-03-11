const cells = document.querySelectorAll(".cell");
const statusText = document.getElementById("status");
const resetBtn = document.getElementById("resetBtn");

let currentPlayer = "X";
let board = ["","","","","","","","",""];
let gameActive = true;

const winConditions = [
[0,1,2],
[3,4,5],
[6,7,8],
[0,3,6],
[1,4,7],
[2,5,8],
[0,4,8],
[2,4,6]
];

cells.forEach((cell,index)=>{
    cell.addEventListener("click", ()=>cellClicked(cell,index));
});

function cellClicked(cell,index){

    if(board[index] !== "" || !gameActive){
        return;
    }

    board[index] = currentPlayer;
    cell.textContent = currentPlayer;

    checkWinner();
}

function checkWinner(){

    let winner = false;

    for(let condition of winConditions){

        let a = board[condition[0]];
        let b = board[condition[1]];
        let c = board[condition[2]];

        if(a === "" || b === "" || c === ""){
            continue;
        }

        if(a === b && b === c){
            winner = true;

            cells[condition[0]].classList.add("win");
            cells[condition[1]].classList.add("win");
            cells[condition[2]].classList.add("win");

            break;
        }
    }

    if(winner){
        statusText.textContent = "Winner: " + currentPlayer;
        gameActive = false;
        return;
    }

    if(!board.includes("")){
        statusText.textContent = "It's a Draw!";
        gameActive = false;
        return;
    }

    currentPlayer = currentPlayer === "X" ? "O" : "X";
    statusText.textContent = "Current Player: " + currentPlayer;
}

resetBtn.addEventListener("click", resetGame);

function resetGame(){

    board = ["","","","","","","","",""];
    gameActive = true;
    currentPlayer = "X";

    statusText.textContent = "Current Player: X";

    cells.forEach(cell=>{
        cell.textContent = "";
        cell.classList.remove("win");
    });
}