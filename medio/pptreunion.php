<!-- Form PPT Reunion -->
<div id="divPPTReunion" class="hiddenDiv">
    <form id="formLlamada">
        <div class="row" style="display: flex; justify-content: center;">
            <div class="col-sm-10 main-div" style="">
                <div class="form-group row" style="margin-top: 15px;">
                    <label for="colFormLabel" class="col-sm-3 col-form-label text-center" style="margin-top: 7px;">Nombre campaña:</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="colFormLabel">
                    </div>

                </div>



                <div class="form-group row" style="margin-top: 10px; margin-bottom:50px;">
                    <label for="colFormLabel" class="col-sm-3 col-form-label text-center" style="margin-top: 7px;">Mes campaña:</label>
                    <div class="col-sm-2">
                        <!-- Aqui se haria un select de los meses que tienen test -->
                        <select type="text" class="form-control" id="colFormLabel">
                            <option>Enero</option>
                            <option>Febrero</option>
                            <option>Marzo</option>
                            <option>Abril</option>
                            <option>Mayo</option>
                            <option>Junio</option>
                            <option>Julio</option>
                            <option>Agosto</option>
                            <option>Septiembre</option>
                            <option>Octubre</option>
                            <option>Noviembre</option>
                            <option>Diciembre</option>
                        </select>
                    </div>
                </div>
                <h1 class="text-center" style="font-size: 2em; color: #70ccd1;">PPT Reunion</h1>
                <div class="col-sm-12">
                    <div class="dropdown col-sm-1" style="margin-top: 30px; margin-bottom: 30px;">
                        <a class="dropbtn">Medio</a>
                        <div class="dropdown-content">
                            <button href="#" id="btnLlamada">Llamada</button>
                            <button href="#" id="btnEmail">e-mail</button>
                            <button href="#" id="btnWhatsApp">WhatsApp</button>
                            <button href="#" id="btnPPTAgencia">PPT agencia</button>
                            <button href="#" id="btnPPTReunion">PPT reunion</button>
                        </div>
                    </div>

                </div>

                <div class="row div-ab" style="border-top: 1px solid #333; padding-top: 30px;">
                    <!-- Test A -->
                    <div class="col-8 col-sm-6">
                        <div class="titlecontainer">
                            <h1 class="title" style="border-bottom: none;">Test A</h1>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea class="form-control box-input" id="" rows="22"></textarea>
                            </div>
                            <div class="form-group col-md-10 div-file">
                                <label class="col-md-2 text-file" for="exampleFormControlFile1">Imagen</label>
                                <input type="file" class="form-control-file col-md-6" id="file" accept="image/*">
                            </div>
                        </div>
                    </div>

                    <!-- Test B -->
                    <div class="col-8 col-sm-6">
                        <div class="titlecontainer">
                            <h1 class="title" style="border-bottom: none;">Test B</h1>
                            <div class="form-group">
                                <label for="">Descripción</label>
                                <textarea class="form-control box-input" id="" rows="22"></textarea>
                            </div>
                            <div class="form-group col-md-10 div-file">

                                <label class="col-md-2 text-file" for="exampleFormControlFile1">Imagen</label>
                                <input type="file" class="form-control-file col-md-6" id="file" accept="image/*">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" style="display: flex; justify-content: flex-end; padding-right: 85px; padding-bottom: 20px;">
                    <button type="button" class="btn btn-danger" onclick="">Cerrar</button>
                    <input type="submit" class="btn btn-success" value="Crear"></input>
                </div>
    </form>
</div>