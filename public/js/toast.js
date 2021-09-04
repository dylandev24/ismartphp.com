function toast({
    title = '',
    message = '',
    type = 'success',
    duration = 3000
}) {
    const main = document.getElementById('main-toast');
    if (main) {
        const toast = document.createElement('div');
        // auto remove toast
        const autoRemoveId = setTimeout(function () {
            main.removeChild(toast);
        }, duration + 1000);

        // remove clicked
        toast.onclick = function (e) {
            if (e.target.closest('.toast-close')) {
                main.removeChild(toast);
                clearTimeout(autoRemoveId);
            }
        }


        const delay = (duration / 1000).toFixed(2);
        toast.classList.add('toast', `toast-${type}`);
        toast.style.animation = `slideInLeft ease 0.3s, fadeOut linear 1s ${delay}s forwards`;
        toast.innerHTML = `
                    <div class="toast-icon">
                        <i class="fa fa-check-circle"></i>
                    </div>
                    <div class="toast-body">
                        <h3 class="toast-title">Success</h3>
                        <p class="toast-msg">${message}</p>
                    </div>
                    <div class="toast-close">
                        <i class="fa fa-times"></i>
                    </div>
                `;
        main.appendChild(toast);
    }
}

function showSuccess() {
    toast({
        title: 'Success',
        message: 'Bạn vừa tăng số lượng!',
        type: 'success',
        duration: 2000
    });
}

function showError() {
    toast({
        title: 'Error',
        message: 'Bạn vừa giảm số lượng !',
        type: 'error',
        duration: 3000
    });
}