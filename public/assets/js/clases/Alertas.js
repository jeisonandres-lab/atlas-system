class Alertas {
  constructor({ position = 'top-end' } = {}) {
    this.defaultPosition = position;
  }

  // equivalente a alertTime(original)
  alertTime(messenger, time = 3000, icon = 'info', position = this.defaultPosition) {
    const Toast = Swal.mixin({
      toast: true,
      position: position,
      showConfirmButton: false,
      timer: time,
      timerProgressBar: false,
    });
    Toast.fire({
      icon: icon,
      title: messenger
    });
  }

  // equivalente a AlertMix(original)
  AlertMix(icon = 'info', messenger = '', position = this.defaultPosition, time = 3000,  callback) {
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
        icon: icon,
        title: messenger
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            callback();
        } else {
            console.log("no se logro realizar ninguna accion");
        }
    }).catch((error) => {
        // Manejar errores que puedan ocurrir durante Swal.fire o cualquier otra operación asincrónica
        console.error("Error occurred:", error);
    });
  }

  // método útil para cambiar posición por defecto en runtime
  setDefaultPosition(position) {
    this.defaultPosition = position;
  }
}

// export por defecto la instancia por si quieres usar métodos o configurar
export default Alertas;




