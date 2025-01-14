<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <meta name="robots" content="noindex" />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"
    ></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container">
        <a class="navbar-brand d-flex gap-2" href=".">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            fill="currentColor"
            class="bi bi-bag-heart-fill"
            viewBox="0 0 16 16"
          >
            <path
              d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"
            />
          </svg>
          Tokoku Admin
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse gap-2" id="navbarSupportedContent">
          <a href="./home" class="btn btn-outline-light ms-auto">
            Halaman Utama
          </a>
        </div>
      </div>
    </nav>
    <div x-data="afianf">
      <div class="container mx-auto p-4">
        <h2>Daftar Produk</h2>
        <p x-text="'menampilkan '+products.length+' barang'"></p>
        <div class="row">
          <div class="col-12">
            <button
              class="btn btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#addmodal"
            >
              + Tambah Produk
            </button>
            <div class="input-group my-2">
              <input
                x-model="keyword"
                type="text"
                class="form-control"
                placeholder="Cari nama produk"
              />
            </div>
            <div class="overflow-x-auto">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <template
                  x-for="(product, i) in products.filter(p => p.nama_produk.toLowerCase().includes(keyword.toLowerCase()))"
                >
                  <tr>
                    <th scope="row" x-text="i+1"></th>
                    <td>
                      <p x-text="product.nama_produk"></p>
                      <div>
                        <button
                          @click="() => selected = JSON.parse(JSON.stringify(product))"
                          data-bs-toggle="modal"
                          data-bs-target="#editmodal"
                          class="btn btn-sm btn-outline-success"
                        >
                          Ubah
                        </button>
                        <button
                          @click="() => hapus(product)"
                          class="btn btn-sm btn-outline-danger"
                        >
                          Hapus
                        </button>
                      </div>
                    </td>
                    <td x-text="product.harga"></td>
                    <td x-text="product.nama_kategori"></td>
                    <td x-text="product.nama_status"></td>
                  </tr>
                </template>
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
      <div
        class="modal fade"
        id="editmodal"
        tabindex="-1"
        aria-labelledby="editmodal"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editmodal">Ubah Produk</h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form @submit="ubah">
                <input
                  name="id_produk"
                  x-model="selected.id_produk"
                  type="hidden"
                />

                <div>
                  <label for="nama_produk" class="form-label"
                    >Nama Produk</label
                  >
                  <div class="input-group">
                    <input
                      required
                      name="nama_produk"
                      x-model="selected.nama_produk"
                      name="nama_produk"
                      type="text"
                      class="form-control"
                      id="nama_produk"
                    />
                  </div>
                </div>
                <div>
                  <label for="harga_produk" class="form-label">Harga</label>
                  <div class="input-group">
                    <input
                      name="harga"
                      x-model="selected.harga"
                      type="number"
                      class="form-control"
                      id="harga_produk"
                    />
                  </div>
                </div>
                <div>
                  <label for="status_produk" class="form-label">Status</label>
                  <select
                    name="status_id"
                    x-model="selected.status_id"
                    class="form-select"
                    id="status_produk"
                  >
                    <template x-for="stat in status">
                      <option
                        :value="stat.id_status"
                        x-text="stat.nama_status"
                      ></option>
                    </template>
                  </select>
                </div>
                <div>
                  <label for="kategori_produk" class="form-label"
                    >Kategori Produk</label
                  >
                  <select
                    name="kategori_id"
                    x-model="selected.kategori_id"
                    class="form-select"
                    id="kategori_produk"
                  >
                    <template x-for="category in categories">
                      <option
                        :value="category.id_kategori"
                        x-text="category.nama_kategori"
                      ></option>
                    </template>
                  </select>
                </div>
                <hr />
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
                <button type="submit" class="btn btn-primary">
                  Simpan Perubahan
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div
        class="modal fade"
        id="addmodal"
        tabindex="-1"
        aria-labelledby="addmodal"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editmodal">Tambah Produk</h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form @submit="tambah">
                <div>
                  <label for="nama_produk" class="form-label"
                    >Nama Produk</label
                  >
                  <div class="input-group">
                    <input
                      required
                      name="nama_produk"
                      type="text"
                      class="form-control"
                      id="nama_produk"
                    />
                  </div>
                </div>
                <div>
                  <label for="harga_produk" class="form-label">Harga</label>
                  <div class="input-group">
                    <input
                      name="harga"
                      type="number"
                      class="form-control"
                      id="harga_produk"
                    />
                  </div>
                </div>
                <div>
                  <label for="status_produk" class="form-label">Status</label>
                  <select
                    name="status_id"
                    class="form-select"
                    id="status_produk"
                  >
                    <template x-for="stat in status">
                      <option
                        :value="stat.id_status"
                        x-text="stat.nama_status"
                      ></option>
                    </template>
                  </select>
                </div>
                <div>
                  <label for="kategori_produk" class="form-label"
                    >Kategori Produk</label
                  >
                  <select
                    name="kategori_id"
                    class="form-select"
                    id="kategori_produk"
                  >
                    <template x-for="category in categories">
                      <option
                        :value="category.id_kategori"
                        x-text="category.nama_kategori"
                      ></option>
                    </template>
                  </select>
                </div>
                <hr />
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
                <button type="submit" class="btn btn-primary">
                  Tambah Sekarang
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script>
      document.addEventListener("alpine:init", () => {
        Alpine.data("afianf", () => ({
          selected: {
            id_produk: "",
            nama_produk: "",
            harga: 0,
            status_id: "",
            kategori_id: "",
          },
          products: [],
          keyword: "",
          categories: [],
          status: [],
          addmodal: new bootstrap.Modal("#addmodal"),
          editmodal: new bootstrap.Modal("#editmodal"),
          async getProduct() {
            const res = await fetch("/fastprint/admin/get_products");
            this.products = await res.json();
          },
          async init() {
            await this.getProduct();
            const res2 = await fetch("/fastprint/admin/get_categories");
            this.categories = await res2.json();
            const res3 = await fetch("/fastprint/admin/get_status");
            this.status = await res3.json();
          },
          async ubah(e) {
            e.preventDefault();
            const fd = new FormData(e.target);
            try {
              const res = await fetch("/fastprint/admin/update", {
                method: "post",
                body: fd,
              });
              const json = await res.json();
              if (json.success) {
                await this.getProduct();
                this.editmodal.hide();
              }
            } catch (err) {
              alert(err);
            }
          },
          async tambah(e) {
            e.preventDefault();
            const fd = new FormData(e.target);
            try {
              const res = await fetch("/fastprint/admin/insert", {
                method: "post",
                body: fd,
              });
              const json = await res.json();
              if (json.success) {
                await this.getProduct();
                this.addmodal.hide();
              }
            } catch (err) {
              alert(err);
            }
          },
          async hapus(product) {
            const yakin = confirm(
              `Yakin ingin menghapus ${product.nama_produk}?`
            );
            if (yakin) {
              try {
                const res = await fetch("/fastprint/admin/delete", {
                  method: "post",
                  headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                  },
                  body: `id_produk=${product.id_produk}`,
                });
                const json = await res.json();
                if (json.success) await this.getProduct();
              } catch (err) {
                alert(err);
              }
            }
          },
        }));
      });
    </script>
  </body>
</html>
