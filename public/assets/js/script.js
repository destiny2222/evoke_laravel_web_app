const Close_eye = document.querySelector(".close-eye");
const Open_eye = document.querySelector(".open-eye");
const PasswordInput = document.querySelector("#password_input");


Close_eye.addEventListener('click', function () {
if (PasswordInput.type === 'password') {
	PasswordInput.type = 'text';
	Close_eye.style.display = 'none';
	Open_eye.style.display = 'block';
} else {
	PasswordInput.type = 'password';
	Close_eye.style.display = 'block';
	Open_eye.style.display = 'none';
}
});

Open_eye.addEventListener('click', function () {
if (PasswordInput.type === 'text') {
	PasswordInput.type = 'password';
	Close_eye.style.display = 'block';
	Open_eye.style.display = 'none';
}
});  