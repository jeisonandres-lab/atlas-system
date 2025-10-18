
export const alertTime = (messenger, time, icons, position) => {
    const Toast = Swal.mixin({
        toast: true,
        position: position,
        showConfirmButton: false,
        timer: time,
        timerProgressBar: false,
    });
    Toast.fire({
        icon: icons,
        title: messenger
    });
}

export const AlertMix = (icons, messenger, position, time) => {
    const Toast = Swal.mixin({
        toast: true,
        position: position,
        showConfirmButton: false,
        timer: time,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: icons,
        title: messenger
    });
}




