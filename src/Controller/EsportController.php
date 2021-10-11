<?php

namespace App\Controller;

use App\Entity\Esport;
use App\Form\EsportType;
use App\Repository\EsportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/esport")
 */
class EsportController extends AbstractController
{
    /**
     * @Route("/", name="esport_index", methods={"GET"})
     */
    public function index(EsportRepository $esportRepository): Response
    {
        return $this->render('esport/index.html.twig', [
            'esports' => $esportRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="esport_new", methods={"GET","POST"})
     * @isGranted("ROLE_ADMIN")
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $esport = new Esport();
        $form = $this->createForm(EsportType::class, $esport);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $photoEsport = $form->get('photoEsport')->getData();
            if ($photoEsport) {
                $originalFilename = pathinfo($photoEsport->getClientOriginalName(), PATHINFO_FILENAME);

                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $photoEsport->guessExtension();

                try {
                    $photoEsport->move(
                        $this->getParameter('photos_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                }
                $esport->setPhotoEsport($newFilename);
            }


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($esport);
            $entityManager->flush();

            return $this->redirectToRoute('esport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('esport/new.html.twig', [
            'esport' => $esport,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="esport_show", methods={"GET"})
     */
    public function show(Esport $esport): Response
    {
        return $this->render('esport/show.html.twig', [
            'esport' => $esport,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="esport_edit", methods={"GET","POST"})
     * @isGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Esport $esport, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(EsportType::class, $esport);
        $form->handleRequest($request);


            if ($form->isSubmitted() && $form->isValid()) {

                $photoEsport = $form->get('photoEsport')->getData();
                if ($photoEsport) {
                    $originalFilename = pathinfo($photoEsport->getClientOriginalName(), PATHINFO_FILENAME);
    
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename . '-' . uniqid() . '.' . $photoEsport->guessExtension();
    
                    try {
                        $photoEsport->move(
                            $this->getParameter('photos_directory'),
                            $newFilename
                        );
                    } catch (FileException $e) {
                    }
                    $esport->setPhotoEsport($newFilename);
                }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('esport_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('esport/edit.html.twig', [
            'esport' => $esport,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="esport_delete", methods={"POST"})
     * @isGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Esport $esport): Response
    {
        if ($this->isCsrfTokenValid('delete' . $esport->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($esport);
            $entityManager->flush();
        }

        return $this->redirectToRoute('esport_index', [], Response::HTTP_SEE_OTHER);
    }
}
