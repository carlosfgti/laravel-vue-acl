import AdminTemplate from '@/layouts/Admin'
import Home from '@/pages/admin/home/home'
import Users from '@/pages/admin/users/users'

const routes = [
    {
        path: '/admin',
        component: AdminTemplate,
        children: [
            {
                path: '/users',
                component: Users,
                name: 'admin.users'
            },
            {
                path: '/',
                component: Home
            }
        ],
    }
]

export default routes
