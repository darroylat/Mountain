
/*
*Validaciones en el registro del nuevo cliente
*
*/

function validaRegistroCliente(){
  
}
  var msg = "Debes escribir algo en los campos:\n";
  if(f.elements[0].value == "")
  {
    msg += "- Jugador 1\n";
    ok = false;
  }

  if(f.elements["jugador2"].value == "")
  {
    msg += "- Jugador 2\n";
    ok = false;
  }

  if(f.jugador3.value == "")
  {
    msg += "- Jugador 3\n";
    ok = false;
  }

  if(ok == false)
    alert(msg);
  return ok;
}
