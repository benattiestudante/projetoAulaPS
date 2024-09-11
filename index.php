<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Organizador de Grade</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="numeroMateria" class="form-label">N&uacute;mero da Mat&eacute;ria</label>
                    <input type="number" class="form-control" id="numeroMateria">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="nomeMateria" class="form-label">Nome da Mat&eacute;ria</label>
                    <input type="text" class="form-control" id="nomeMateria">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="preRequisito" class="form-label">Pr&eacute; Requisito</label>
                    <input type="text" class="form-control" id="preRequisito">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="cargaHoraria" class="form-label">Carga Hor&aacute;ria Total</label>
                    <input type="number" class="form-control" id="cargaHoraria">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="form-label" for="btnAdd">&nbsp;</label>
                    <button class="btn btn-outline-primary" id="btnAdd" onclick="addMateria()">Adicionar Mat&eacute;ria</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <table class="table" id="tabelaMaterias">
                    <thead>
                        <th>N&uacute;mero da Mat&eacute;ria</th>
                        <th>Nome da Mat&eacute;ria</th>
                        <th>Pr&eacute; Requisito</th>
                        <th>Carga Hor&aacute;ria Total</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label class="form-label" for="checkMaterias">&nbsp;</label>
                    <button class="btn btn-outline-primary" id="checkMaterias" onclick="consoleMaterias(materias)">Console Mat&eacute;rias</button>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label class="form-label" for="geraGrades">&nbsp;</label>
                    <button class="btn btn-outline-success" id="geraGrades" onclick="geraGrade(materias)">Gera Grade</button>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>

        var materias = [];

        const tabela = document.querySelector('#tabelaMaterias tbody');

        function addMateria(){

            var materia = {
                nmrMateria: document.getElementById('numeroMateria').value,
                nomeMateria: document.getElementById('nomeMateria').value,
                preRequisito: document.getElementById('preRequisito').value,
                cargaHoraria: document.getElementById('cargaHoraria').value
            }

            materias.push(materia);

            var newRow = document.createElement('tr');

            Object.values(materia).forEach(value => {
                var newCol = document.createElement('td');
                newCol.textContent = value;
                newRow.appendChild(newCol);
            })

            tabela.appendChild(newRow);
        }

        function consoleMaterias(materias){
            console.log(materias);
        }

        function geraGrade(materias){

            var data = {
                materias: materias
            }
            console.log(data);

            fetch('backend.php', {
                method: 'POST',
                headers: {
                    'Content-Type' : 'application/json'
                },
                body: JSON.stringify(data)
            }).then(response => {
                console.log(response);
            });
        }

    </script>
  </body>
</html>