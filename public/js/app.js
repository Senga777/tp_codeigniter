/* 
 * Agnes@needemand
 */
/* global ROOT */

document.addEventListener("DOMContentLoaded", function () {
    console.log('Ready');
    // remove tag
    const btns = document.querySelectorAll(".recipe_tag--remove");
    const ul = document.querySelector("#recipe_tag--list");
    const id = ul.getAttribute('data-ir');
    btns.forEach(function (elt) {
        elt.addEventListener('click', function (event) {
            event.preventDefault();
            let id_tag = this.getAttribute('data-it');
            deleteTag(id, id_tag).then((response) => {
                if (response) {
                    if (response.success) {
                        alert('Suppresion ok');
                        this.parentElement.remove();
                    }
                }
            });
        });
    });

    async function deleteTag(id_recipe, id_tag) {
        console.log(id, id_tag);
        // Requete
        var myHeaders = new Headers();

        let formData = new FormData();
        formData.append('id_recipe', id_recipe);
        formData.append('id_tag', id_tag);

        var myInit = {method: 'POST',
            headers: myHeaders,
            mode: 'cors',
            cache: 'default',
            body: formData
        };



        let response = await fetch(ROOT + '/tag/delete', myInit);
        try {
            if (response.ok) {
                return await response.json();
            } else {
                return false;
            }
        } catch (e) {
            console.error(e.message);
        }


    }


});
