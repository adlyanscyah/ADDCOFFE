<?php
?>
<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ADMIN PRODUCT</title>

    <!-- JavaScript -->
    <script src="../js/adminproduct.js"></script>

    <!-- AlpineJS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap"
      rel="stylesheet"
    />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- My Style -->
    <link rel="stylesheet" href="../CSS/adminproduct.css"

  </head>

<body>
    <div x-data x-init="$store.dataStore.load()" class="container">
            <div class="card mt-4">
                <div class="card-body">
                        <form @submit.prevent="if($store.dataStore.formEdit) $store.dataStore.updateUser($store.dataStore.user); else $store.dataStore.addUser()">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input x-model="$store.dataStore.user.name" type="text" class="form-control" id="name" placeholder="Your Name">
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                            <input x-model="$store.dataStore.user.email" type="email" class="form-control" id="email" placeholder="Your Email">
                          </div>
                          <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="user in $store.dataStore.users" :key="index">
                                <tr>
                                    <td x-text="user.name"></td>
                                    <td x-text="user.email"></td>
                                    <td>
                                        <button @click="$store.dataStore.edit(user)" type="button" class="btn btn-info">edit</button>
                                        
                                        <button @click="$store.dataStore.delete(user.id)" class="btn btn-danger">delete</button>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div> 
</body>
</html>