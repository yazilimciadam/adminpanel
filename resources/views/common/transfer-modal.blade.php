<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Transfer?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="transfer-form" action="{{ route('transfer') }}" method="POST" >
                    {{ csrf_field() }}
               <div class="col-md-12">
                <label for="">Coin Adresi</label>
                <input type="text" class="form-control" placeholder="Coin SYMBOL" name="coin" id="address">
                <br>
                <label for="">Coin Network Ağı</label>
                <input type="text" placeholder="BSC/TRX" class="form-control" name="network" id="network">
                <br>
                <label for="">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="0X4123123">
            </div>
               <div class="col-md-12">
                <label for="">Aktarılacak Tutar</label>
                <input type="text" name="quantity" id="amount" placeholder="1000" class="form-control">
               </div>
              
            </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('transfer') }}"
                    onclick="event.preventDefault(); document.getElementById('transfer-form').submit();">
                    Create Transfer
                </a>

               
            </div>
        </div>
    </div>
</div>
