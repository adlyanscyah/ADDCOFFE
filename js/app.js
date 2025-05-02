document.addEventListener("alpine:init", () => {
  Alpine.data("products", () => ({
    items: [
      { id: 1, name: "Coffe Flores", img: "Coffe Flores.jpg", price: 50000 },
      { id: 2, name: "Java Robusta", img: "Java Robusta.jpg", price: 30000 },
      { id: 3, name: "Gayo Coffe", img: "kopi gayo.jpg", price: 40000 },
      {
        id: 4,
        name: "Arabika Malabar",
        img: "Arabika Malabar.jpg",
        price: 15000,
      },
      {
        id: 5,
        name: "Bali Coffe",
        img: "Coffe Bali Kintamani.jpg",
        price: 25000,
      },
      { id: 6, name: "Gayo Robusta", img: "Robusta Gayo.jpg", price: 35000 },
    ],
  }));

  Alpine.store("cart", {
    items: JSON.parse(localStorage.getItem("cart-items")) || [],
    total: JSON.parse(localStorage.getItem("cart-total")) || 0,
    quantity: JSON.parse(localStorage.getItem("cart-quantity")) || 0,

    persist() {
      localStorage.setItem("cart-items", JSON.stringify(this.items));
      localStorage.setItem("cart-total", JSON.stringify(this.total));
      localStorage.setItem("cart-quantity", JSON.stringify(this.quantity));
    },

    add(newItem) {
      const cartItem = this.items.find((item) => item.id === newItem.id);

      if (!cartItem) {
        this.items.push({ ...newItem, quantity: 1, total: newItem.price });
        this.quantity++;
        this.total += newItem.price;
      } else {
        this.items = this.items.map((item) => {
          if (item.id !== newItem.id) {
            return item;
          } else {
            item.quantity++;
            item.total = item.price * item.quantity;
            this.quantity++;
            this.total += item.price;
            return item;
          }
        });
      }

      this.persist(); // simpan ke localStorage
    },

    remove(id) {
      const cartItem = this.items.find((item) => item.id === id);

      if (cartItem.quantity > 1) {
        this.items = this.items.map((item) => {
          if (item.id !== id) {
            return item;
          } else {
            item.quantity--;
            item.total = item.price * item.quantity;
            this.quantity--;
            this.total -= item.price;
            return item;
          }
        });
      } else if (cartItem.quantity === 1) {
        this.items = this.items.filter((item) => item.id !== id);
        this.quantity--;
        this.total -= cartItem.price;
      }

      this.persist(); // simpan ke localStorage
    },
  });
});

document.addEventListener("alpine:init", () => {
  Alpine.data("menu", () => ({
    items: [
      { id: 1, name: "Americano Lemon", img: "americano.jpg", price: 25000 },
      { id: 2, name: "Expresso", img: "expresso.jpg", price: 15000 },
      { id: 3, name: "Cappucinno Cinta", img: "cappucinno.jpg", price: 32000 },
      {
        id: 4,
        name: "Coffe Latte Bunga",
        img: "late.jpg",
        price: 34000,
      },
      {
        id: 5,
        name: "Macchiato",
        img: "macchiato.jpg",
        price: 37000,
      },
      { id: 6, name: "Piccolo Latte", img: "piccolo latte.jpg", price: 35000 },
    ],
  }));

  Alpine.store("cart", {
    items: JSON.parse(localStorage.getItem("carts-items")) || [],
    total: JSON.parse(localStorage.getItem("carts-total")) || 0,
    quantity: JSON.parse(localStorage.getItem("carts-quantity")) || 0,

    persist() {
      localStorage.setItem("carts-items", JSON.stringify(this.items));
      localStorage.setItem("carts-total", JSON.stringify(this.total));
      localStorage.setItem("carts-quantity", JSON.stringify(this.quantity));
    },

    add(newItem) {
      const cartItem = this.items.find((item) => item.id === newItem.id);

      if (!cartItem) {
        this.items.push({ ...newItem, quantity: 1, total: newItem.price });
        this.quantity++;
        this.total += newItem.price;
      } else {
        this.items = this.items.map((item) => {
          if (item.id !== newItem.id) {
            return item;
          } else {
            item.quantity++;
            item.total = item.price * item.quantity;
            this.quantity++;
            this.total += item.price;
            return item;
          }
        });
      }

      this.persist(); // simpan ke localStorage
    },

    remove(id) {
      const cartItem = this.items.find((item) => item.id === id);

      if (cartItem.quantity > 1) {
        this.items = this.items.map((item) => {
          if (item.id !== id) {
            return item;
          } else {
            item.quantity--;
            item.total = item.price * item.quantity;
            this.quantity--;
            this.total -= item.price;
            return item;
          }
        });
      } else if (cartItem.quantity === 1) {
        this.items = this.items.filter((item) => item.id !== id);
        this.quantity--;
        this.total -= cartItem.price;
      }

      this.persist(); // simpan ke localStorage
    },
  });
});

//Form Validation
const checkoutButton = document.querySelector(".checkout-button");
checkoutButton.disabled = true;

const form = document.querySelector("#checkoutForm");

form.addEventListener("keyup", function () {
  for (let i = 0; i < form.elements.length; i++) {
    if (form.elements[i].value.length !== 0) {
      checkoutButton.classList.add("disabled");
      checkoutButton.classList.remove("disabled");
    } else {
      return false;
    }
  }
  checkoutButton.disabled = false;
  checkoutButton.classList.remove("disabled");
});

//Kirim Data Ketika Botton checkout di klik
checkoutButton.addEventListener("click", async function (e) {
  e.preventDefault();
  const formData = new FormData(form);
  const data = new URLSearchParams(formData);
  const objData = Object.fromEntries(data);
  //const message = formatMessage(objData);
  //window.open(
  //  "http://wa.me/+6285861738147?text=" + encodeURIComponent(message)
  //);

  //minta transaction token menggunakan ajax/fecth
  try {
    const response = await fetch("/userpanel/placeOrder.php", {
      method: "POST",
      body: data,
    });
    const token = await response.text();
    //console.log(token);
    window.snap.pay(token);
  } catch (err) {
    console.log(err.message);
  }
});

//format pesan whatsapp
const formatMessage = (obj) => {
  return `Data Customer
  Nama : ${obj.name}
  Email: ${obj.email}
  No HP: ${obj.phone}
  Data Pesanan
  ${JSON.parse(obj.items).map(
    (item) => `${item.name} (${item.quantity} x ${item.total})}\n`
  )}
  TOTAL: ${obj.total}
  Terima Kasih.`;
};

// Konversi Ke Rupiah
//const rupiah = (Number) => {
//return new Intl.NumberFormat("id-ID", {
//  style: "currency",
// currency: "IDR",
//minimumFractionDigits: 0,
// }).format(Number);
//};
