<?php


namespace App\Controller\Pages;


use App\Entity\Doctor;
use App\Service\DoctorService;
use App\Service\SertificateService;
use App\Service\WorksGalleryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DoctorController extends AbstractController
{
    /**
     * @var DoctorService
     */
    private $doctorService;
    /**
     * @var SertificateService
     */
    private $sertificateService;
    /**
     * @var WorksGalleryService
     */
    private $worksGalleryService;

    /**
     * MainController constructor.
     * @param DoctorService $doctorService
     * @param SertificateService $sertificateService
     * @param WorksGalleryService $worksGalleryService
     */
    public function __construct(
        DoctorService $doctorService,
        SertificateService $sertificateService,
        WorksGalleryService $worksGalleryService
    )
    {
        $this->doctorService = $doctorService;
        $this->sertificateService = $sertificateService;
        $this->worksGalleryService = $worksGalleryService;
    }

    public function index()
    {
        return $this->render('public/doctors/index.html.twig',[
            'doctors' => $this->doctorService->findBy([], ['queue' => 'ASC']),
            'sertificates' => $this->sertificateService->findBy([], ['doctor' => 'ASC', 'queue' => 'ASC'])
        ]);
    }

    public function singleDoctor(Doctor $doctor)
    {
        return $this->render('public/doctors/single.html.twig', [
            'doctor' => $doctor,
            'works' => $this->worksGalleryService->findBy([], ['queue' => 'ASC'])
        ]);
    }
}
