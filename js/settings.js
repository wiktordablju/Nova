// Funkcje na przekierowywanie do odpwowiednich stron na ustawienia

const loginBtn = document.querySelector("#login-btn")
const registerBtn = document.querySelector("#register-btn")
const deleteAccBtn = document.querySelector("#delete-acc-btn")
const changeLanguageBtn = document.querySelector("#change-language-btn")

function login() {
	window.location.href = "./../index.html"
}

function register() {
	window.location.href = "./../index.html"
}

function deleteAcc() {
	window.location.href = "./../index.html"
}

function changeLanguage() {
	window.location.href = "./../index.html"
}

loginBtn.addEventListener("click", login)
registerBtn.addEventListener("click", register)
deleteAccBtn.addEventListener("click", deleteAcc)
changeLanguageBtn.addEventListener("click", changeLanguage)
