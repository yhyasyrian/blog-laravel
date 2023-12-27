function progress(typeProgress,allRation,limit){
    let addTitleForProgress = document.querySelector(`.post #${typeProgress}`);
    if (addTitleForProgress == undefined) {
        return;
    }
    let typeTitle = 'bad';
    let number = 0;
    let ratio = 0;
    addTitleForProgress.addEventListener('input',() => {
        number = addTitleForProgress.value.length;
        ratio = number * allRation;
        if (number > limit) {
            return;
        }
        if (ratio <= 25) {
            typeTitle = 'bad';
        } else if (ratio <= 65) {
            typeTitle = 'good';
            console.log(typeTitle)
        } else if (ratio <= 110) {
            typeTitle = 'excellent';
        } else if (ratio <= 150) {
            typeTitle = 'good';
            console.log(typeTitle)
        } else {
            typeTitle = 'bad';
        }
        document.getElementById(`${typeProgress}-type-progress`).setAttribute('data-type',typeTitle);
        document.getElementById(`${typeProgress}-progress-number`).innerText = Math.floor(ratio);
        document.getElementById(`${typeProgress}-progress`).style.width = ratio.toString()+'%';
        document.getElementById(`${typeProgress}-progress`).setAttribute('data-progress',typeTitle);
    });
}
progress('title',1.6666666666667,100);
progress('description',0.625,300);
