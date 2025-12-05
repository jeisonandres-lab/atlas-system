
(function () {
   var $sel = jQuery('.cotenedor_tabla_usuarios .users-table');
   if ($sel.length === 0) return;

   let table = $sel.DataTable({
      paging: true,
      searching: true,
      ordering: true,
      info: false,
      responsive: true,
      processing: true,
      lengthMenu: [2, 10, 25],
      pageLength: 10,
      serverSide: false,
      deferRender: true,
      info: false,
      language: {
         url: 'idiomaEspañol.json',
      },
      ajax: {
         url: './src/lib/dataTables/MOCK_DATA.json',
         type: 'GET',
         dataSrc: function (json) {
            // DataTables espera un array. Soportamos ambos formatos:
            // 1) array puro: [ {...}, {...} ]
            // 2) objeto con { data: [...] }
            if (Array.isArray(json)) {
               console.log('dataUsuerio: formato JSON array detectado:', json);
               return json;
            }

            if (json && Array.isArray(json.data)) return json.data;
            console.error('dataUsuerio: formato JSON inesperado en', json);
            return [];
         }
      },

      // Mapear columnas desde el JSON
      columns: [
         { data: null },
         { data: 'id' },
         { data: 'id' },
         { data: null },
         { data: null },
         { data: null },
         { data: null },
      ],

   });
})();
