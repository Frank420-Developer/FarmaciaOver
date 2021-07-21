// LOGIN INTERCTIVO

const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});


// VER CONTRASEÑA

let x = document.querySelector('#contra');
let ojo = document.querySelector('#ojo');
	function verContra(){

		if(x.type=== 'password'){
			x.setAttribute("type", "text");
			ojo.classList.remove("fa-eye-slash");
			ojo.classList.add('fa-eye');
		}else{
			x.setAttribute("type", "password");
			ojo.classList.remove("fa-eye");
			ojo.classList.add("fa-eye-slash");
		}
	}

	


