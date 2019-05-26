<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Countries Controller
 *
 * @property \App\Model\Table\CountriesTable $Countries
 *
 * @method \App\Model\Entity\Country[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CountriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if ($this->request->is('post')) {
            if (!empty($this->request->getData('name'))) {
                $country_name = $this->request->getData('name');
                $limit = 1000;
            } else {
                $country_name = '';
                $limit = 10;
            }
        } else {
            $country_name = '';
            $limit = 10;
        }
        $this->paginate = [
            'conditions' => array(
                'name LIKE' => '%' . $country_name . '%'
            ),
            'limit' => $limit,
            'order' => [
                'name' => 'asc'
            ]
        ];
        $this->set('countries', $this->paginate($this->Countries));
        $this->set('_serialize', ['countries']);
    }

    /**
     * View method
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $country = $this->Countries->get($id, [            
            'contain' => []
        ]);
        $this->set('country', $country);
        $this->set('_serialize', ['country']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $country = $this->Countries->newEntity();
        if ($this->request->is('post')) {
            $country = $this->Countries->patchEntity($country, $this->request->getData());
            $country['created_by'] = $this->Auth->user('id');
            if ($this->Countries->save($country)) {
                $this->Flash->success('The country has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The country could not be saved. Please, try again.');
            }
        }
        $this->set(compact('country'));
        $this->set('_serialize', ['country']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $country = $this->Countries->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $country = $this->Countries->patchEntity($country, $this->request->getData());
            $country['modified_by'] = $this->Auth->user('id');
            if ($this->Countries->save($country)) {
                $this->Flash->success('The country has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The country could not be saved. Please, try again.');
            }
        }
        $this->set(compact('country'));
        $this->set('_serialize', ['country']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Country id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /* public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $country = $this->Countries->get($id);
        if ($this->Countries->delete($country)) {
            $this->Flash->success(__('The country has been deleted.'));
        } else {
            $this->Flash->error(__('The country could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */

    public function check_country_name($id = null)
    {
        $country_name = $this->request->getData('name');
        if (!empty($id)) {
            $countryName = $this->Countries->find('all')->select(['name'])->where(['name' => $country_name, 'NOT' => array('id' => $id)]);
        } else {
            $countryName = $this->Countries->find('all')->select(['name'])->where(['name' => $country_name]);
        }
        $countryArr = $countryName->toArray();
        if (count($countryArr) > 0) {
            $dataArr['success'] = 'true';
        } else {
            $dataArr['success'] = 'false';
        }
        echo json_encode($dataArr);
        exit;
    }
}
