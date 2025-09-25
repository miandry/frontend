function initStockDetailPage() {
  let stock = JSON.parse(sessionStorage.getItem("stockObjectToShow"));
  async function loadProduct() {
    try {
      showLoader();
      const response = await fetch(
        `/api/v2/node/product?filters[nid][val]=${stock.field_product_id.nid}`
      );
      const dataArray = await response.json();
      let data = dataArray.rows[0];
      fillDetails(data);
    } catch (error) {
      console.error("Error loading stocks:", error);
    } finally {
      hideLoader();
    }
  }

  function fillDetails(data) {
    
    document.getElementById('productImage').setAttribute("src", data.field_images[0].image.url);
    document.getElementById('productName').textContent = data.title;
    document.getElementById('author').textContent = stock.uid.name;
    if (stock.field_type == "Entrée") {
        document.getElementById('type').classList.add('stock-entry');
    } else {
        document.getElementById('type').classList.add('stock-out');
    }
    document.getElementById('type').textContent = stock.field_type;
    document.getElementById('stQtty').textContent = stock.field_quantite;
    document.getElementById('prName').textContent = data.title;
    document.getElementById('productCategorie').textContent = data.field_category.title;
    document.getElementById('ref').textContent = data.field_sku;
    document.getElementById('prQttyDispo').textContent = data.field_quantite_disponible;
    document.getElementById('description').textContent = data.field_description;
  }

  function showLoader() {
    document.getElementById("page-loader").classList.remove("hidden");
  }

  function hideLoader() {
    document.getElementById("page-loader").classList.add("hidden");
  }

  let goBack = document.getElementById('goBack');
  goBack.classList.remove('hidden')
  goBack.addEventListener('click', function () {
    window.app.page = "all-stocks"
  })

  loadProduct();
}
