function fuera(){

const picker = document.getElementById("fecha");
picker.addEventListener("input", function(e){
  var day = new Date(this.value).getUTCDay();
  const selectdDay = new Date(this.value).setHours(0,0,0,0);
  const today = new Date(new Date().setHours(0,0,0,0));
  if([6,0].includes(day)){
    e.preventDefault();
    this.value ="";
 
  // document.getElementById("info2").innerHTML = "Selecciona un dia entre semana ";
    alert("Elije un dia entre semana");
  }else if(selectdDay < today) {
    this.value = "";
    alert('Elije un día después de hoy');
  }
});
}
