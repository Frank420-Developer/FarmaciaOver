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


let x = document.querySelector('#contra');
let eye = document.getElementById('eye');

eye.addEventListener('click', function(e){
	e.preventDefault();
	verContra();
});
	

function verContra(){
	if(x.ATTRIBUTE_NODE.type === "password"){
		x.ATTRIBUTE_NODE.type === "text";
		// eye.classList.remove('fas-eye-slash');
		// eye.classList.add('fas-eye');
	}else{
		x.type === "password";
		// eye.classList.remove('fas-eye');
		// eye.classList.add('fas-eye-slash');
	}
}