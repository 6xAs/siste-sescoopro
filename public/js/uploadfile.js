function imagePrincipal(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#visualizar')
                     .attr('src', e.target.result)
                     .width(840)
                     .height(350);
             };

             reader.readAsDataURL(input.files[0]);
         }
}

function mostraUm(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#mostraU')
                     .attr('src', e.target.result)
                     .width(550)
                     .height(330);
             };

             reader.readAsDataURL(input.files[0]);
         }
}

function mostraDois(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#mostraD')
                     .attr('src', e.target.result)
                     .width(550)
                     .height(330);
             };

             reader.readAsDataURL(input.files[0]);
         }
}

function mostraTres(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#imageTres')
                     .attr('src', e.target.result)
                     .width(550)
                     .height(330);
             };

             reader.readAsDataURL(input.files[0]);
         }
}

function mostraQuat(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();

             reader.onload = function (e) {
                 $('#imageQuatro')
                     .attr('src', e.target.result)
                     .width(550)
                     .height(300);
             };

             reader.readAsDataURL(input.files[0]);
         }
}
