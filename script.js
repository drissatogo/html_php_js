// Validation du formulaire côté client
   function onSubmit() {
    alert("zert");
      var nom = document.getElementById('nom');
      var prenom = document.getElementById('prenom');
      var email = document.getElementById('email');
      var age = document.getElementById('age');
      var date_de_naissance = document.getElementById('date_de_naissance');
      var promotion = document.getElementById('promotion');
      var annee_de_certification = document.getElementById('annee_de_certification');
      var numero = document.getElementById('numero');
      var file = document.getElementById('file')

      var errorMessage = document.getElementById('error-message');
      connexion = new XMLHttpRequest();
      connexion.open("POST","inscription.php");
      formData = new FormData();
      formData.append(nom.name, nom.value);
      formData.append(prenom.name, prenom.value);
      formData.append(age.name, age.value);
      formData.append(date_de_naissance.name, date_de_naissance.value);
      formData.append(email.name, email.value);
      formData.append(date_de_naissance.name, date_de_naissance.value);
      formData.append(promotion.name, promotion.value);
      formData.append(annee_de_certification.name, annee_de_certification.value);
      formData.append(numero.name, numero.value);
      formData.append(file.name, file.files[0]);

      connexion.send(formData)
      connexion.onload = function (){
      if (connexion.readyState === XMLHttpRequest.DONE && connexion.statues == 200 ){
        errorMessage.innerHTML= connexion.responseText;
      }
      }

    }

  
      // if (nomInput.value.trim() === '' || prenomInput.value.trim() === '' || emailInput.value.trim() === ''
      //      || date_de_naissanceInput.value.trim() === '' || promotionInput.value.trim() === ''
      // || ageInput.value.trim() === '' || annee_de_certificationInput.value.trim() ==='' || numeroInput.value.trim() === ''  ) {
      //   errorMessage.textContent = 'Veuillez remplir tous les champs.';
      //      event.preventDefault();}

     var error=false;
document.getElementById('photo').addEventListener('click',ev=>{
    document.getElementById('file').click();
      const reader = new FileReader();
      const fileInput = document.getElementById('file');
      const imag = document.getElementById('photo');
      fileInput.addEventListener('change', e =>{
        const f=e.target.files[0];
        reader.readAsDataURL(f);
      });
      reader.onload = e =>{
        imag.src = e.target.result;
      }
     
});
