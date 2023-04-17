// Funkcje na przekierowywanie do odpwowiednich stron na ustawienia

const loginBtn = document.querySelector("#login-btn")
const profileBtn = document.querySelector("#profile-btn")
const registerBtn = document.querySelector("#register-btn")
const deleteAccBtn = document.querySelector("#delete-acc-btn")

function login() {
	window.location.href = "./../html/login.php"
}

function profile() {
	window.location.href = "./../html/profile.php"
}

function register() {
	window.location.href = "./../html/register.php"
}

function deleteAcc() {
	window.location.href = "./../html/delete_account.php"
}

if (loginBtn) {
	loginBtn.addEventListener("click", login)
}
registerBtn.addEventListener("click", register)
deleteAccBtn.addEventListener("click", deleteAcc)
profileBtn.addEventListener("click", profile)
