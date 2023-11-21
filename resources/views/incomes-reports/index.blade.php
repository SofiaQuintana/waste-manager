<!DOCTYPE html>
<html lang="es">

<head>
    <!-- ...otros encabezados... -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
</head>

<body>
    <!-- ...contenido... -->
    <div class="wrapper">
        @include('layouts.header')
        <div class="reports container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-7 col-lg-12">
                                <h4 class="mb-3">Reportes de ingresos de basura</h4>
                                <form action="{{ route('incomes-report.store') }}" method="post" >
                                    @csrf
                                    <div class="report-row row g-3">
                                        <div class="col-12">
                                            <label for="restriction" class="form-label">Restricciones</label>
                                            <select class="form-select" id="restriction" name="restriction">
                                                <option selected disabled>Seleccionar tipo de restricciones</option>
                                                <option value="1">Totales</option>
                                                <option value="2">Por rango de fechas</option>
                                                <option value="3">Por empleado</option>
                                            </select>
                                        </div>
                                        <div id="dates">
                                            <div class="col-sm-6">
                                                <label for="start_date" class="form-label">Fecha inicio:</label>
                                                <input type="date" class="form-control" id="start_date" name="start_date"
                                                    value="{{ old('start_date', \Carbon\Carbon::now()->toDateString()) }}">
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="end_date" class="form-label">Fecha final:</label>
                                                <input type="date" class="form-control" id="end_date" name="end_date"
                                                    value="{{ old('end_date', \Carbon\Carbon::now()->toDateString()) }}">
                                            </div>
                                        </div>
                                        <button class="w-100 btn btn-primary " type="submit">Generar Reporte</button>
                                        <hr class="my-4">
                                            
                                    </div>
                                </form>
                            </div>
                            @if ($incomes)
                                @include('incomes-reports.table')
                            @endif
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        // Script para actualizar la cantidad disponible al seleccionar un producto
        document.getElementById('restriction').addEventListener('change', function () {
            var selectedIndex = this.selectedIndex;
            if(selectedIndex == 2){
                document.getElementById('dates').style.display = "flex";       
            } else {
                document.getElementById('dates').style.display = "none";
            }
           
        });
    </script>
    @include('layouts.scripts')
</body>

</html>
