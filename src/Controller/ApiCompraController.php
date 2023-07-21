<?php

namespace App\Controller;

use App\Entity\Compra;
use App\Form\CompraType;
use App\Repository\CompraRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('api/compra')]
class ApiCompraController extends AbstractController
{

    ///api/compra/?id=id&usuario=usuario&orden=DESC
    ///api/compra/?id=5&usuario=2&orden=DESC
    ///api/compra/?id=4
    ///api/compra/?orden=DESC
    ///api/compra/?usuario=2
    #[Route('/', name: 'api_compra_index', methods: ['GET'])]
    public function index(Request $request, CompraRepository $compraRepository, SerializerInterface $serializer): Response
    {
        // OBJETIVO: Controladores pequeños
        //  Utilizar repositorios para las consultas a la Base de Datos
        //  Utilizar los repositorios con filtros para filtrar los datos
        //  Utilizar servicios para hacer más pequeños los controladores


        // EJEMPLO DE CONTROLADOR GRANDE
        // Controlador que utiliza diferentes consultaa en función de parámetros de la petición
        // Se suelen utilizar método predefinidos. Coge parámetros de la petición y hace una consulta u otra
        // if($request->query->get('id')) {
        //     $compras = $compraRepository->findById($request->query->get('id'));
        // }
        // if($request->query->get('usuario')) {
        //     $compras = $compraRepository->findByUsuario($request->query->get('usuario'));
        // }
        // if($request->query->get('orden')) {
        //     $compras = $compraRepository->findByOrder([], ['id' => $request->query->get('orden')]);
        // }
        // //(...)
        // else {
        //     $compras = $compraRepository->findAll();
        // }

        // Otra opción es utilizar un metodo personalizado en el repositorio al que le pasamos variables. Separamos asuntos: MVC
        // Solo coge cosas de la vista y utiliza el modelo para obtener los datos
        // Siempre es mejor filtrar en el back

        $compras = $compraRepository->filter(
            $request->query->get('id'), 
            $request->query->get('usuario'), 
            $request->query->get('orden')
        );

        // Serializar los datos en el controlador ya que son objetos relacionados
        $jsonCompras = $serializer->serialize($compras, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            },
        ]);

        return new JsonResponse($jsonCompras, 200, [], true);

        // En la idea de seguir reduciendo los controladores a su mínima expresión también podemos crear y utilizar servicios. Los creamos y los inyectamos en el controlador.
        // En Symfony, un controlador es una clase que contiene funciones (métodos) que manejan las solicitudes entrantes y generan las respuestas correspondientes. 
        
    }

}
