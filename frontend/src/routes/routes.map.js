import AdminTemplate from '@/layouts/Admin'
import Home from '@/pages/admin/home/home'
import Users from '@/pages/admin/users/users'
import Profiles from '@/pages/admin/profiles/profiles'

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
                path: '/profiles',
                component: Profiles,
                name: 'admin.profiles'
            },
            {
                path: '/',
                component: Home
            }
        ],
    }
]

export default routes
