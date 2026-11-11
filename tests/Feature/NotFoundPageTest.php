<?php

test('an unknown url returns the not found page', function () {
    $response = $this->get('/pagina-que-no-existe');

    $response->assertNotFound();
    $response->assertSee('Página no encontrada');
    $response->assertSee('Esta dirección no existe.');
    $response->assertSee('Ir al inicio');
});
