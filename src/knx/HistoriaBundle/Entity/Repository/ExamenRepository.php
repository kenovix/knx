<?php

namespace knx\HistoriaBundle\Entity\Repository;
use Doctrine\ORM\EntityRepository;

class ExamenRepository extends EntityRepository {

	public function findListAllExaHc($paciente) {
		$em = $this->getEntityManager();
		$dql = $em
				->createQuery(
						"SELECT
										ex.nombre,ex.tipo,hcEx.resultado,ex.id
									 FROM
										HistoriaBundle:HcExamen hcEx
									 JOIN
										hcEx.examen ex
									 JOIN
										hcEx.hc hc										
									 JOIN
										hc.factura f
									 JOIN
										f.paciente p
									 WHERE
										p.id = :id	
									 AND 
										hcEx.estado != 'P'									
									 ORDER BY
										hcEx.fecha_r DESC");

		$dql->setParameter('id', $paciente);
		return $dql->getResult();
	}
}
