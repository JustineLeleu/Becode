let displayName = document.getElementById("display-firstname");
let inputName = document.getElementById("firstname");
let sectionHardTruth = document.getElementById("a-hard-truth");
let inputAge = document.getElementById("age");
let inputPassword = document.getElementById("pwd");
let inputPasswordConfirm = document.getElementById("pwd-confirm");
let inputSelect = document.getElementById("toggle-darkmode");

inputName.addEventListener("keyup", addName);
inputAge.addEventListener("keyup", checkAge);
inputPassword.addEventListener("keyup", checkPwd);
inputPasswordConfirm.addEventListener("keyup", checkPwdConfirm);
inputSelect.addEventListener("change", changeMode);

function addName()
{
    displayName.innerHTML = inputName.value;
}

function checkAge()
{
    if (inputAge.value >= 18)
    {
        sectionHardTruth.style.visibility = "visible";
    }
    else
    {
        sectionHardTruth.style.visibility = "hidden";
    }
}

function checkPwd()
{
    if (inputPassword.value.length < 6)
    {
        inputPassword.style.backgroundColor = "red";
    }
    else
    {
        inputPassword.style.backgroundColor = "white";
    }

    if (inputPasswordConfirm.value.length > 0 && inputPasswordConfirm.value != inputPassword.value)
    {
        inputPasswordConfirm.style.backgroundColor = "red";
    }
}

function checkPwdConfirm()
{
    if (inputPasswordConfirm.value != inputPassword.value)
    {
        inputPasswordConfirm.style.backgroundColor = "red";
    }
    else
    {
        inputPasswordConfirm.style.backgroundColor = "white";
    }
}

function changeMode()
{
    switch (inputSelect.value) {
        case "light":
            document.body.style.backgroundColor = "white";
            document.body.style.color = "black";
            break;

        case "dark":
            document.body.style.backgroundColor = "black";
            document.body.style.color = "white";
            break;
    
        default:
            break;
    }
}