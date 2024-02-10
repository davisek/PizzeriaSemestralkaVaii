<div class="modal fade" id="addPizza" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="addModalLabel">Pridanie pizze</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/admin/add/pizza" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input class="addInput" type="text" name="name" placeholder="Meno pizze *" required>
                    <input class="addInput" type="text" name="ingredients" placeholder="Ingrediencie *" required>
                    <input class="addInput" type="number" name="weight" placeholder="Váha *" pattern="^\d*(\.\d{0,2})?$" min="0" step=".01" required>
                    <input class="addInput" type="number" name="price" placeholder="Cena *" pattern="^\d*(\.\d{0,2})?$" min="0" step=".01" required>
                    <p>Vybrať obrázok na pridanie</p>
                    <input class="addInput" type="file" name="img" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavrieť</button>
                    <button type="submit" class="btn btn-success">Pridať pizzu</button>
                </div>
            </form>
        </div>
    </div>
</div>
