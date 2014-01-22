<?php 
namespace Stefanius\WebprototyperBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Stefanius\WebprototyperBundle\Entiy\Page;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class SitemapCommand extends Command
{
	protected $pageUrls = array();
	
    protected function configure()
    {
        $this
            ->setName('webprototyper:sitemap:generate')
            ->setDescription('Generate XML sitemap')
            ->addArgument(
                'domain',
                InputArgument::REQUIRED,
                "The domain prefix for your URL's"
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
    	$em = $this->getApplication()->getKernel()->getContainer()->get('doctrine')->getEntityManager();
    	$qb = $em->getRepository('StefaniusWebprototyperBundle:Page')
			     ->createQueryBuilder('e')
			     ->select();
    	
    	$query = $qb->getQuery();
    	$pages = $query->getResult();
    	
    	$domain = $input->getArgument('domain');
    	$domain = trim($domain, '/');
    	
    	$xmlBlock = $this->getXmlBlock();
    	
    	foreach($pages  as $page){
    		$this->pageUrls[] = $this->generateSitemapNode($xmlBlock,$domain, $page->getUrl());
    	}
		
    	$fs = new Filesystem();
    	
    	$fs->dumpFile(__DIR__.'/../Resources/sitemap.xml', $this->generateSitemapBody($this->pageUrls));
    }
    
    protected function getXmlBlock(){
    	return '<url><loc>{{domain}}{{url}}</loc><changefreq>daily</changefreq><priority>0.7</priority></url>';
    }
    
    protected function generateSitemapNode($block,$domain, $url){
    	return str_replace(array('{{domain}}', '{{url}}') , array($domain, $url) , $block );
    }
    
    protected function generateSitemapBody($pageurls){
    	return str_replace('{{body}}' , implode('', $pageurls) , '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">{{body}}</urlset>');
    }
}