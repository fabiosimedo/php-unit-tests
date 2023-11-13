<?php

namespace Test\Unit;

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class AvaliadorTest extends TestCase 
{

  public function testOne(): void
  {
        // Arrange - Given
    $leilao = new Leilao('Fiat 147 0KM');

    $maria = new Usuario('Maria');
    $joao = new Usuario('João');

    $leilao->recebeLance(new Lance($joao, 2000));
    $leilao->recebeLance(new Lance($maria, 2500));

    $leiloeiro = new Avaliador();

    // Act - When
    $leiloeiro->avalia($leilao);

    $maiorValor = $leiloeiro->getMaiorValor();

    // Assert - Then
    // $valorEsperado = 2500;

    $this->assertEquals(2500, $maiorValor);
  }

}