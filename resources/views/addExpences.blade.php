<div class="container mt-5">
    <h1>Expences Form</h1>
    <form>
      <div class="mb-3">
        <label for="expence-name" class="form-label">Expence Name</label>
        <input type="text" class="form-control" id="expence-name" placeholder="Enter expence Title">
      </div>
      <div class="mb-3">
        <label for="expence-amount" class="form-label">Expence Amount</label>
        <input type="number" class="form-control" id="amount" placeholder="Enter Amount">
      </div>
      <div class="mb-3">
        <label for="expence-date" class="form-label">Date</label>
        <input type="text" class="form-control" id="date" placeholder="Select date">
      </div>
      <div class="mb-3">
        <label for="expence-detail" class="form-label">Expence detail</label>
        <textarea type="text" class="form-control" id="expence-detail" rows="3" placeholder="Enter description"></textarea>
      </div>
      
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-secondary">Cancel</button>
    </form>
  </div>