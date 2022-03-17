                        <div class="price-range">
                            <div class="sec-title">
                                <h6>Precio</h6>
                            </div>
                            <div class="price-filter">
    							<div id="slider-range"></div>
    							<input type="text" id="amount" readonly>
                                <button type="button" id="btn-range-price" name="button">Filtrar</button>
						    </div>
                        </div>

                        <script>
                            $('#btn-range-price').on('click', function(e){
                                    console.log($('#amount').val());
                                e.preventDefault();
                            })
                            
                        </script>