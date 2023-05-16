const filterBox = document.querySelectorAll('.catalog__item');

function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
  }
  

document.querySelector('.catalog__nav').addEventListener('click', event=> {
    if (event.target.tagName !== 'LI') return false;

    let filterClass = event.target.dataset['f'];
    
    filterBox.forEach( elem => {
        elem.classList.remove('hide');
        if (!elem.classList.contains(filterClass) && filterClass !== 'all') {
            elem.classList.add('hide');
        }
    })
});

// document.getElementById("hide").onclick = function() {
//     document.getElementById("register").style.display = "none";
// }

// function removeHide() {
//     var elem = document.querySelector('.hide');
//     elem.parentNode.removeChild(elem);
//     return false;
// }

