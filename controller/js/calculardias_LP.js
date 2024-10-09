 // Manejador de eventos para el campo de Tipoincapacidad
 document.getElementById('Tipoincapacidad').addEventListener('change', calcularDias);

 // Manejador de eventos para el campo de Fechainicio
 document.getElementById('Fechainicio').addEventListener('change', calcularDias);

 // Manejador de eventos para el campo de Fechacontrato
document.getElementById('Fechacontrato').addEventListener('change', calcularDias);

 function calcularDias() {
     // Obtener las fechas
     const fechaContratoStr = document.getElementById('Fechacontrato').value; // Asegúrate que este campo tenga un valor
     const fechaInicioStr = document.getElementById('Fechainicio').value; // Asegúrate que este campo tenga un valor
     const tipoIncapacidad = document.getElementById('Tipoincapacidad').value; // Obtener el valor del tipo de incapacidad

     // Convertir cadenas a fechas
     const fechaContrato = new Date(fechaContratoStr);
     const fechaInicio = new Date(fechaInicioStr);

     // Verificar que ambas fechas sean válidas
     if (isNaN(fechaContrato.getTime()) || isNaN(fechaInicio.getTime())) {
         return; // Salir si alguna fecha no es válida
     }

     // Verificar si el tipo de incapacidad es 5
     if (tipoIncapacidad == 5) {
         // Calcular la diferencia en meses completos
         const diffMonths = (fechaInicio.getFullYear() - fechaContrato.getFullYear()) * 12 + (fechaInicio.getMonth() - fechaContrato.getMonth());

         // Calcular la diferencia en días
         const daysDiff = fechaInicio.getDate() - fechaContrato.getDate();

         // Convertir la diferencia de días a meses (suponiendo un mes promedio de 30.44 días)
         const averageDaysInMonth = 30.44; // Puedes ajustar esto si deseas
         const daysToMonths = daysDiff / averageDaysInMonth;

         // Calcular la diferencia total en meses (incluyendo días)
         let totalDiffMonths = diffMonths + daysToMonths;
         // Asegurarse de que la diferencia total en meses no sea negativa
        totalDiffMonths = Math.max(totalDiffMonths, 0);

         let dias;
         if (totalDiffMonths >= 9) {
             dias = 14; // Si la diferencia es igual o mayor a 9 meses
         } else {
             // Regla de tres simple para calcular los días
             const diasPorMes = 14 / 9; // 14 días son a 9 meses
             dias = totalDiffMonths * diasPorMes;
         }
       // Redondear a 2 decimales
       dias = Math.max(Math.round(dias * 100) / 100, 0); // Asegurarse de que no sea negativo

         // Redondear a un entero
         dias = Math.round(dias);
         
       // Limitar el resultado a un máximo de 14 días
       dias = Math.min(dias, 14);
         // Llenar el campo de días
         document.getElementById('Totaldias').value = dias; // Formatear a dos decimales
     } else {
         // Limpiar el campo Totaldias si tipoIncapacidad no es 5
         document.getElementById('Totaldias').value = '';
     }
 }