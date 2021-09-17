function changeTheme() {
    var newColor1 = '#' + Math.floor(Math.random() * 16777215).toString(16);
    var newColor2 = newColor1 + '00'
    var Theme = 'linear-gradient(to bottom left,' + newColor1 + ',' + newColor2 + ')'
    document.querySelector("body").style.background = Theme

}

function defaultTheme() {
    document.querySelector("body").style.background = 'linear-gradient(to bottom left, rgb(226, 0, 215), rgb(120, 50, 250), rgb(141, 0, 223))'
}