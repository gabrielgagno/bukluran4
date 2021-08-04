<template>
<form @submit.prevent="submit">
    <div class="form-label-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" autofocus />
    </div>
    <div class="form-label-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
    </div>
</form>
</template>
<script>
</script>
