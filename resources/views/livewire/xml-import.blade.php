<div>

        <div class="form-group">
            <label for="xml_file">Wybierz plik XML:</label>

            <button type="submit" wire:click="importXml" class="btn btn-primary">Importuj</button>


    <div class="progress">
        <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">{{ $progress }}%</div>
    </div>
    {{ $progress }}%, zaktualizowano {{ $updated_products }} produktow z {{ $total_products }}
</div>

