

    const limit=[
        ["06:00:00", "18:00:00"],
        ["06:00:00", "18:00:00"]
    ];
     
    document.querySelector("input[type=time]").addEventListener("change", function(e) {
        // obtenemos el valor introducido por el usuario
        const user = this.value.split(":");
     
        // recorremos todas las fechas limite
        // Si devuelve true, esta entre algunas de las fechas
        const result = limit.some(el => {
            let start = el[0].split(":");
            let end = el[1].split(":");
     
            // comprobamos que este entre las fechas limite
            return (start[0]<user[0] || (start[0]==user[0] && start[1]<=user[1])) && (end[0]>user[0] || (end[0]==user[0] && end[1]>=user[1]))
        });
        // e.preventDefault();
        // this.value = "";
        // alert("Elije una hora entre el rango 06:00 am y 18:00 pm");
        document.getElementById("info").innerHTML = result ? " " : this.value = ""+ "Selecciona una hora entre el rango 06:00 am y 18:00 pm ";
    
    });
